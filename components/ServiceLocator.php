<?php

class ServiceLocator
{
    /**
     *
     * @var array
     */
    protected $instances = [];
    /**
     *
     * @var array
     */
    protected $services = [];
    /**
     * @var null
     */
    protected static $instance = null;

    /**
     * ServiceLocator constructor.
     */
    function __construct()
    {

    }

    /**
     * return ServiceLocator
     */
    static public function getInstance()
    {
        return self::$instance = new ServiceLocator ();
    }

    /**
     *
     * @param string $name
     * @param string $class
     * @param array $params
     * @return boolean
     */
    public function addService($name, $class, $params = [])
    {
        if (!array_key_exists($name, $this->services)) {
            $this->services[$name] =
                [
                    'class' => $class,
                    'params' => $params,
                    'name' => $name,
                ];
            return true;
        } else {
            return false;
        }

    }

    /**
     *
     * @param string $name
     * @param object $obj
     * @param array $params
     * @return boolean
     */
    public function addInstance($name, $obj, $params = [])
    {
        $class = get_class($obj);
        if ($this->addService($name, $class, $params)) {
            $this->instances [$name] = $obj;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $class
     * @return mixed|null
     */
    public function getByClass($class)
    {
        foreach ($this->services as $service) {

            if ($service['class'] == $class) {
                return $service;
            }
        }
        return null;
    }

    /**
     * @param $name
     * @return null|object
     * @throws ReflectionException
     */
    public function make($name)
    {
        if (array_key_exists($name, $this->services)) {
            $class = new ReflectionClass($this->services[$name]['class']);

            $constructor = $class->getConstructor();
            $parameters = $constructor->getParameters();
            $parametersNew = [];
            foreach ($parameters as $key => $parameter) {
                if ($parameter->getClass() != null) {

                    $service = $this->getByClass($parameter->getClass()->name);
                    if ($service != null) {
                        $parametersNew[$key] = $this->make($service['name']);

                    } else {
                        $parametersNew[$key] = null;
                    }
                } else {
                    if (array_key_exists($key, $this->services[$name]['params'])) {
                        $parametersNew[$key] = $this->services[$name]['params'][$key];
                    } else {
                        $parametersNew[$key] = null;
                    }

                }

            }
            $instance = $class->newInstanceArgs($parametersNew);
            return $this->instances[$name] = $instance;
        } else {
            return null;
        }
        /**
         * посмотреть параметры создаваемого сервиса
         * понять есть ли в этих параметрах другие сервисы
         * если есть сервисы создать их при помощи рекурсии
         * и только тогда создать экземпляр сервиса
         * передать в параметрах те параметры которые указаны заранее
         * и сервисы которые созданы на лету
         *
         *
         * создание сервиса при помощи анонимной функции
         * там где описание сервисов
         * у сервиса должна хранится анонимная функция котоаря создает сервис без функции make()
         */
    }
}
// 		$locator = ServiceLocator::getInstance();
// 		$locator->addService('jopa','Utils');
// 		$locator->addService('paginator', Pagination::class,[
// 				10,1,10,'page'
// 		]);
// // 		$paginator = $locator->make('paginator');
// 		$utils = $locator->make('jopa');
// 		$utils->test();
// 		$this->view->make('about/index');