<?php
//
//namespace CaioMarcatti12\Core\Cli;
//
//use CaioMarcatti12\Data\ObjectMapper;
//use CaioMarcatti12\Objects\Interfaces\RouterResponseInterface;
//
//class RouterResponseCLI implements RouterResponseInterface
//{
//    private mixed $body;
//    private int $status = 200;
//    private array $headers = [];
//
//    public function __construct(mixed $body, int $status = 200, array $headers = [])
//    {
//        $this->body = $body;
//        $this->status = $status;
//        $this->headers = $headers;
//    }
//
//    public function headers(): array
//    {
//       return $this->headers();
//    }
//
//    public function code(): int
//    {
//        return $this->status;
//    }
//
//
//    public function response(): string
//    {
//        if(is_array($this->body)) return $this->arrayResponse();
//        if(is_object($this->body)) return $this->objectResponse();
//
//        return $this->stringResponse();
//    }
//
//    private function stringResponse(): string{
//        return $this->body ?? '';
//    }
//
//    private function arrayResponse(): string{
//        $response = '';
//
//        $maxSizeByColumn = $this->parseSizeColumns();
//
//
//        foreach(array_keys($this->body) as $key){
//            $response .= str_pad($key, $maxSizeByColumn[$key], ' ', STR_PAD_RIGHT) . ' | ' ;
//        }
//
//        $response .= PHP_EOL;
//
//        foreach($this->body as $key => $value){
//            if(is_array($value)) $value = 'array';
//            $response .= str_pad($value, $maxSizeByColumn[$key], ' ', STR_PAD_RIGHT) . ' | '; ;
//        }
//
//        $response .= PHP_EOL;
//
//        return $response;
//    }
//
//    private function objectResponse(): string{
//        $this->body = ObjectMapper::toArray($this->body);
//        return $this->arrayResponse();
//    }
//
//    private function parseSizeColumns(): array{
//        $columns = [];
//
//        foreach(array_keys($this->body) as $key){
//            $size = strlen($key);
//
//            if(!isset($columns[$key])) $columns[$key] = 0;
//            if($columns[$key] < $size) $columns[$key] = $size;
//        }
//
//        foreach($this->body as $key => $value){
//            if(!is_array($value)){
//                $size = strlen($value);
//                if(!isset($columns[$key])) $columns[$key] = 0;
//                if($columns[$key] < $size) $columns[$key] = $size;
//            }
//        }
//
//        return $columns;
//    }
//}