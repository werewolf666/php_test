<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 18-12-3
 * Time: 下午8:58
 */


//获取函数传递的参数
//get_num_args();
//func_get_args();获取传递的全部参数
//函数的代理调用，不直接调用函数，采用PHP内部call_user_func_array('函数名',参数数组)函数调用。一般在参数个数不确定的时候采用这个函数。

//

function action(){
    //目标函数形参为零
    if(!empty($array=func_get_args())){
        echo 'you never give any args';
    }else{
        echo '1';
    }

}

action();