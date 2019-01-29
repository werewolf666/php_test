<?php
/**
 * Class Framework
 * 框架自动加载类
 */
class Framework{
    /**
     * run函数
     */
    public static function run(){
        self::initConst();
        self::initConfig();
        self::initError();
        self::initRoutes();
        self::initRegisterAutoLoad();
        self::initDispatch();
    }


    /**
     * 定义目录常量
     */
    private static function initConst(){
        define('DS',DIRECTORY_SEPARATOR);// 定义目录分隔符
        define('ROOT_PATH',getcwd().DS); //定义木常量
        define('APP_PATH',ROOT_PATH.'Application'.DS);// Application目录
        define('FRAMEWORK_PATH',ROOT_PATH.'Framework'.DS);//Framework目录
        define('PUBLIC_PATH',ROOT_PATH.'Public'.DS);//Public目录
        define('CONFIG_PATH',APP_PATH.'Config'.DS);//Config目录
        define('CONTROLLER_PATH',APP_PATH.'Controller'.DS);//Controller目录
        define('MODEL_PATH',APP_PATH.'Model'.DS);//Model目录
        define('VIEW_PATH',APP_PATH.'View'.DS);//View目录
        define('CORE_PATH',FRAMEWORK_PATH.'Core'.DS);//Core目录
        define('LIB_PATH',FRAMEWORK_PATH.'Lib'.DS);//Lib目录
        define('LOG_PATH',APP_PATH.'logs'.DS);//log日志目录
    }

    /**
     * 导入配置文件
     */
    private static function initConfig(){
        $GLOBALS['config']=require CONFIG_PATH.'config.php';
    }

    /**
     * 确定路由
     */
    private static function initRoutes(){
        $p=isset($_REQUEST['p'])?ucfirst($_REQUEST['p']):$GLOBALS['config']['application']['default_platform'];//首字母大写
        $c=isset($_REQUEST['c'])?ucfirst($_REQUEST['c']):$GLOBALS['config']['application']['default_controller'];//首字母大写
        $a=isset($_REQUEST['a'])?lcfirst($_REQUEST['a']):$GLOBALS['config']['application']['default_action'];//首字母小写
        define('PLATFORM_NAME',$p);
        define('CONTROLLER_NAME',$c);
        define('ACTION_NAME',$a);
        define('__URL__',CONTROLLER_PATH.PLATFORM_NAME.DS);//当前控制器的目录
        define('__VIEW__',VIEW_PATH.PLATFORM_NAME.DS);//当前视图的目录

    }

    /**
     * @param $class_name
     * 加载类
     * 为了能够自动加载这个函数，将该函数写入:spl_autoload_register(){}栈中,该函数将要自动执行的函数写入__autoload(){}中
     */
    private static function autoLoad($class_name){
        $class_map=array(
            'MYSQLDB'   =>CORE_PATH.'MYSQLDB.class.php',
            'Model'     =>CORE_PATH.'Model.class.php',
            'Controller'=>CORE_PATH.'Controller.class.php'

        );
        if(isset($class_map[$class_name])){
            //加载类
            require $class_map[$class_name];
        }
        elseif(substr($class_name,-5)=='Model'){
            //加载模型类
            require MODEL_PATH.$class_name.'.class.php';
        }

        elseif(substr($class_name,-10)=='Controller'){
            //加载控制器类
            require __URL__.$class_name.'.class.php';
        }
        elseif(substr($class_name,-3)=='Lib'){
            //加载Lib类
            require LIB_PATH.$class_name.'.class.php';
        }
    }

    /**
     * 注册自定义函数
     * 为了能够自动加载这个函数，将该函数写入:spl_autoload_register(){}栈中,该函数将要自动执行的函数写入__autoload(){}中
     */
    private static function initRegisterAutoLoad(){
        spl_autoload_register('self::autoLoad');
    }

    /**
     * 请求分发函数
     */
    private static function initDispatch(){
        //请求分发函数
        $controller_name=CONTROLLER_NAME.'Controller';           //拼接控制器名字
        $action_name=ACTION_NAME.'Action';           //拼接方法名字
        $controller=new $controller_name;   //实例化控制器 MemberController
        $controller->$action_name();        //调用方法
    }

    /**
     * 日志函数
     */
    private function initError(){
        ini_set('error_reporting',E_ALL | E_STRICT);
        if ($GLOBALS['config']['application']['app_debug']){//开发模式在浏览器上显示错误并日志记录
            ini_set('display_errors','on'); //开启浏览器显示
            ini_set('log_errors','off');//关闭日志功能
        }
        else{ //关闭浏览器显示错误并且开启日志显示
            ini_set('display_errors','off');
            ini_set('log_errors','on');
            ini_set('error_log',LOG_PATH.'error.log');//日志地址
        }
    }
}
