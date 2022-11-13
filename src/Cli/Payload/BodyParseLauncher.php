<?php

namespace CaioMarcatti12\Core\Cli\Payload;

//#[RunTimeLaucher]
//class BodyParseLauncher implements LauncherInterface
//{
//    #[Autowired]
//    private ArgvParserInterface $argvParser;
//
//    public function handler(): void
//    {
//        $params = $this->argvParser->getAll();
//
//        var_dump($params);
//
////        if(!Assert::isNull($argv))
////        {
////            $args = (new ArgvParser())->parseConfigs($argv);
////
////            if (!Assert::isNull($args)) {
////                array_map(function($key, $value) {
////                    Body::add($key, $value);
////                },
////                array_keys($args),
////                array_values($args));
////            }
////
////            if(Assert::keyExists('body', $args)){
////                $input = json_decode($args['body'], TRUE);
////
////                if (!Assert::isNull($input)) {
////                    array_map(function($key, $value) {
////                        Body::add($key, $value);
////                    },
////                    array_keys($input),
////                    array_values($input));
////                }
////            }
////        }
//    }
//}