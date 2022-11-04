<?php
namespace CaioMarcatti12\Core;

use Composer\Autoload\ClassLoader;

class ExtractPhpNamespace
{
    private static function getRootPathApplication(): string{
        $reflection = new \ReflectionClass(ClassLoader::class);
        $vendorDir = dirname(dirname($reflection->getFileName()));

        return $vendorDir.'/../';
    }

    public static function getFilesApplication(): array{
        $path = self::getRootPathApplication().'/app/';
        return self::getFiles($path);
    }

    public static function getFilesFramework(): array{
        $path = self::getRootPathApplication().'/vendor/caiomarcatti12/';
        return self::getFiles($path);
    }

    private static function getFiles(string $path): array
    {
        $fqcns = array();

        if(!is_dir($path)) return $fqcns;

        $allFiles = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        $phpFiles = new \RegexIterator($allFiles, '/\.php$/');
        foreach ($phpFiles as $phpFile) {
            $content = file_get_contents($phpFile->getRealPath());
            $tokens = token_get_all($content);
            $namespace = '';
            for ($index = 0; isset($tokens[$index]); $index++) {
                if (!isset($tokens[$index][0])) {
                    continue;
                }
                if (T_NAMESPACE === $tokens[$index][0]) {
                    $index += 2; // Skip namespace keyword and whitespace
                    while (isset($tokens[$index]) && is_array($tokens[$index])) {
                        $namespace .= $tokens[$index++][1];
                    }
                }
                if (T_CLASS === $tokens[$index][0] && T_WHITESPACE === $tokens[$index + 1][0] && T_STRING === $tokens[$index + 2][0]) {
                    $index += 2; // Skip class keyword and whitespace
                    $fqcns[] = $namespace . '\\' . $tokens[$index][1];

                    break;
                }
            }
        }

        return $fqcns;
    }
}