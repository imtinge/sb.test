<?php
/**
 * @name IndexController
 * @author tanagisa
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class UserController extends Yaf_Controller_Abstract {
    public function indexAction() {
        return $this->loginAction();
    }

    public function loginAction() {
        $submit = $this->getRequest()->getQuery("submit");
        if ( $submit != "1") {
            echo json_encode(array("errno" => -1001, "errmsg"=>"渠道错误"));
            return false;
        }
        $uname = $this->getRequest()->getPost('uname', false);
        $pwd = $this->getRequest()->getPost('pwd', false);
        if(!$uname || !$pwd) {
            echo json_encode(
                array(
                    'errno' => -1002,
                    'errmsg' => '用户名和密码必须传'
                )
            );
            return false;
        }
        $model = new UserModel();
        $uid = $model->login(trim($uname), trim($pwd));
        if ($uid) {
            session_start();
            $_SESSION['user_token'] = md5("salt".$_SERVER['REQUEST_TIME'].$uid);
            $_SESSION['user_token_tiem'] = $_SERVER['REQUEST_TIME'];
            $_SESSION['user_id'] = $uid;
            echo json_encode(
                array(
                    "errno"=>0,
                    "errmsg"=>"",
                    "data"=> array("name"=>$uname)
                )
            );
        } else {
            echo json_encode(
                array(
                    "errno"=>$model->errno,
                    "errmsg"=>$model->errmsg,
                )
            );
        }
        return false;
    }

    public function registerAction() {
        $uname = $this->getRequest()->getPost('uname', false);
        $pwd = $this->getRequest()->getPost('pwd', false);
        if(!$uname || !$pwd) {
            echo json_encode(
                array(
                    'errno' => -1002,
                    'errmsg' => '用户名和密码必须传'
                )
            );
            return false;
        }

        $model = new UserModel();
        if ( $model->register( trim($uname), trim($pwd))) {
            echo json_encode(
                array(
                    "errno" => 0,
                    "errmsg" => '',
                    "data" => array("name" => $uname)
                )
            );
        } else {
            echo json_encode(
                array(
                    "errno" => $model->errno,
                    "errmsg" => $model->errmsg
                )
            );
        }

        return false;
    }
}
