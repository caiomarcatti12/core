<?php
//
//namespace CaioMarcatti12\Core\Resolver;
//
//use CaioMarcatti12\Logger\Log;
//use CaioMarcatti12\Env\Property;
//use CaioMarcatti12\Core\Bean\BeanLoader;
//use CaioMarcatti12\I18n\Translator;
//use CaioMarcatti12\Event\EventLoader;
//use CaioMarcatti12\Core\Validation\Assert;
//use CaioMarcatti12\Core\Cli\RouterResponseCLI;
//use CaioMarcatti12\I18n\TranslatorLoader;
//use CaioMarcatti12\Core\Bean\Objects\BeanProxy;
//use CaioMarcatti12\Webserver\Adapter\SwooleAdapter;
//use CaioMarcatti12\Core\Cli\Adapter\PhalconAdapter;
//use CaioMarcatti12\Logger\Adapter\NoLogAdapter;
//use CaioMarcatti12\Security\Adapter\JwtAdapter;
//use CaioMarcatti12\Logger\Adapter\MonologAdapter;
//use CaioMarcatti12\Logger\Interfaces\LogInterface;
//use CaioMarcatti12\Mailer\Adapter\PhpMailerAdapter;
//use CaioMarcatti12\Captcha\Adapter\RecaptchaAdapter;
//use CaioMarcatti12\Core\Bean\Annotation\AnnotationResolver;
//use CaioMarcatti12\Core\Cli\Interfaces\ArgvParserInterface;
//use CaioMarcatti12\Mailer\Adapter\MemoryMailerAdapter;
//use CaioMarcatti12\Captcha\Interfaces\CaptchaInterface;
//use CaioMarcatti12\Captcha\Adapter\CaptchaMemoryAdapter;
//use CaioMarcatti12\Mailer\Interfaces\SendEmailInterface;
//use CaioMarcatti12\QueueManager\Adapter\RabbitMQAdapter;
//use CaioMarcatti12\Core\Bean\Interfaces\ClassResolverInterface;
//use CaioMarcatti12\CacheManager\Adapter\RedisCacheAdapter;
//use CaioMarcatti12\CacheManager\Interfaces\CacheInterface;
//use CaioMarcatti12\Event\Interfaces\EventManagerInterface;
//use CaioMarcatti12\CacheManager\Adapter\MemoryCacheAdapter;
//use CaioMarcatti12\Core\Annotation\EnableAutoConfiguration;
//use CaioMarcatti12\Event\Adapter\EventManagerMemoryAdapter;
//use CaioMarcatti12\QueueManager\Adapter\QueueMemoryAdapter;
//use CaioMarcatti12\Webserver\Interfaces\WebServerRunnerInterface;
//use CaioMarcatti12\Observability\Interfaces\MetricInterface;
//use CaioMarcatti12\Objects\Interfaces\RouterResponseInterface;
//use CaioMarcatti12\Security\Interfaces\TokenProviderInterface;
//use CaioMarcatti12\Observability\Adapter\PrometheusRedisAdapter;
//use CaioMarcatti12\Observability\Adapter\PrometheusMemoryAdapter;
//use CaioMarcatti12\QueueManager\Interfaces\QueueManagerInterface;
//
//#[AnnotationResolver(EnableAutoConfiguration::class)]
//class EnableAutoConfigurationResolver implements ClassResolverInterface
//{
//    public function handler(object &$instance): void
//    {
//        if(Assert::equalsIgnoreCase(Property::get('application.env', 'test'), 'test')){
//            $this->test();
//        }else{
//            $this->prod();
//        }
//
//        BeanLoader::loader(Log::class);
//
//        $eventLoader = BeanLoader::loader(EventLoader::class);
//        $eventLoader->load();
//
//        $translatorLoader = BeanLoader::loader(TranslatorLoader::class);
//        $translatorLoader->load();
//
//        Translator::select(Property::get('application.language', 'pt-br'));
//    }
//
//    public function test(): void{
//        BeanProxy::add(ArgvParserInterface::class, PhalconAdapter::class);
//        BeanProxy::add(WebServerRunnerInterface::class, SwooleAdapter::class);  // OK
//        BeanProxy::add(LogInterface::class, NoLogAdapter::class);  // OK
//        BeanProxy::add(TokenProviderInterface::class, JwtAdapter::class);
//        BeanProxy::add(EventManagerInterface::class, EventManagerMemoryAdapter::class);  // OK
//        BeanProxy::add(MetricInterface::class, PrometheusMemoryAdapter::class);
//        BeanProxy::add(CacheInterface::class, MemoryCacheAdapter::class);
//        BeanProxy::add(SendEmailInterface::class, MemoryMailerAdapter::class); // OK
//        BeanProxy::add(CaptchaInterface::class, CaptchaMemoryAdapter::class); // OK
//        BeanProxy::add(QueueManagerInterface::class, QueueMemoryAdapter::class); // OK
//        BeanProxy::add(RouterResponseInterface::class, RouterResponseCLI::class); // OK
//    }
//
//    public function prod(): void{
//        BeanProxy::add(ArgvParserInterface::class, PhalconAdapter::class);
//        BeanProxy::add(WebServerRunnerInterface::class, SwooleAdapter::class);  // OK
//        BeanProxy::add(LogInterface::class, MonologAdapter::class);  // OK
//        BeanProxy::add(TokenProviderInterface::class, JwtAdapter::class);
//        BeanProxy::add(EventManagerInterface::class, EventManagerMemoryAdapter::class);  // OK
//        BeanProxy::add(MetricInterface::class, PrometheusRedisAdapter::class);
//        BeanProxy::add(CacheInterface::class, RedisCacheAdapter::class);
//        BeanProxy::add(SendEmailInterface::class, PhpMailerAdapter::class); // OK
//        BeanProxy::add(CaptchaInterface::class, RecaptchaAdapter::class); // OK
//        BeanProxy::add(QueueManagerInterface::class, RabbitMQAdapter::class); // OK
//
//    }
//}