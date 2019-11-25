<?php

class Utilities
{
    protected $_config = null;

    public function __construct()
    {
        require_once dirname(__FILE__) . '/../Config.php';
        $this->_config = new Config();
    }

    /**
     * encrypt string use salt
     * @param $data
     * @param $salt
     * @return string
     */
    public function encrypt($data, $salt): string
    {
        if (empty($data)) return null;
        $salt = sha1(md5($salt));
        $x = 0;
        $len = strlen($data);
        $l = strlen($salt);
        $char = null;
        $str = null;
        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) {
                $x = 0;
            }
            $char .= $salt{$x};
            $x++;
        }
        for ($i = 0; $i < $len; $i++) {
            $str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
        }
        return base64_encode($str);
    }

    /**
     * decrypt string use salt
     * @param $data
     * @param $salt
     * @return string
     */
    public function decrypt($data, $salt): string
    {
        if (empty($data)) return null;
        $salt = sha1(md5($salt));
        $x = 0;
        $data = base64_decode($data);
        $len = strlen($data);
        $l = strlen($salt);
        $char = null;
        $str = null;
        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) {
                $x = 0;
            }
            $char .= substr($salt, $x, 1);
            $x++;
        }
        for ($i = 0; $i < $len; $i++) {
            if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1))) {
                $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
            } else {
                $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
            }
        }
        return $str;
    }

    /**
     * Alert handler
     * @param $message
     * @param $method
     */
    public function raise_alert($message, $method)
    {
        echo "<script type=\"text/javascript\"> alert(\"$message\");";
        echo "window.location.href = \"https://reg.akvicor.com\"; </script>";

//        if ($message == $this->_config->getStatusOrdinary()) return;
//        $message = $this->_config->getTranslateCode($message);
        exit();

        switch ($method) {
            case 1: // 直接弹出，无取消按钮
                echo "<script type=\"text/javascript\"> alert(\"$message\"); </script>";
                break;
            case 2: // 有取消按钮
                echo "<script type=\"text/javascript\"> confirm(\"$message\"); </script>";
                break;
            case 3: // 弹出输入框
                echo "<script type=\"text/javascript\"> prompt(\"$message\"); </script>";
                break;
            case 4: // 未知
                echo "<script type=\"text/javascript\"> document.write(\"$message\"); </script>";
                break;
            case 5: // 写入控制台 F12 查看
                echo "<script type=\"text/javascript\"> console.log(\"$message\"); </script>";
                break;
            default:
                echo '<script type="text/javascript"> alert("Wrong method code!"); </script>';
        }
    }

    public function parent_redirect($loc)
    {
        $url = $this->_config->getPROTOCOL() . $this->_config->getDOMAIN() . $this->_config->getPATH() . $loc;
        echo "<script>window.parent.location.href = '$url';</script>";
    }

    public function redirect($page)
    {
        exit();
//        return;
        header("Location: $page");
    }

    /**
     * merge space for array
     * @param string $str
     * @return string
     */
    public function trim_merge_spaces(string $str)
    {
        return trim(preg_replace("/\s(?=\s)/", "\\1", $str));
    }

    /**
     * use delimiter split string to array
     * @param string $str
     * @param string $delimiter
     * @return array
     */
    public function makeArray($str, $delimiter)
    {
        $arr = explode($delimiter, $str);  //Cut
        $arr = $this->deleteVoid($arr);
        return $arr; //return array
    }

    /**
     * Delete void for array
     * @param $arr
     * @return array
     */
    public function deleteVoid($arr)
    {
        $newArr = Array();
        foreach ($arr as $val) {
            if (isset($val) AND $val) {
                array_push($newArr, $val);
            }
        }
        return $newArr; //return array
    }

    /**
     * Get Ip
     * @return array|false|string
     */
    public function getClientIP()
    {
        if (getenv("HTTP_CLIENT_IP")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } elseif (getenv("HTTP_X_FORWARDED_FOR")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } elseif (getenv("REMOTE_ADDR")) {
            $ip = getenv("REMOTE_ADDR");
        } else $ip = "Unknow";

        return $ip;
    }

    function getIp()
    {
        static $ip = '';
        $ip = $_SERVER['REMOTE_ADDR'];
        if (isset($_SERVER['HTTP_CDN_SRC_IP'])) {
            $ip = $_SERVER['HTTP_CDN_SRC_IP'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
            foreach ($matches[0] AS $xip) {
                if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                    $ip = $xip;
                    break;
                }
            }
        }
        return $ip;
    }

    /**
     * php访问url路径，get请求
     * @param $url
     * @return bool|string
     */
    public function curl_file_get_contents($url)
    {
        // header传送格式
        $headers = array(
            "token:123",
        );
        // 初始化
        $curl = curl_init();
        // 设置url路径
        curl_setopt($curl, CURLOPT_URL, $url);
        // 将 curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
        curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
        // 添加头信息
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        // CURLINFO_HEADER_OUT选项可以拿到请求头信息
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        // 不验证SSL
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        // 执行
        $data = curl_exec($curl);
        // 打印请求头信息
//    echo curl_getinfo($curl, CURLINFO_HEADER_OUT);
        // 关闭连接
        curl_close($curl);
        // 返回数据
        return $data;
    }

    /**
     * php访问url路径，post请求
     * @param $url
     * @param $_data
     * @return bool|string
     */
    public function curl_file_post_contents($url, $_data)
    {
        // header传送格式
        $headers = array(
            "token:123",
        );
        //初始化
        $curl = curl_init();
        parse_str($_data, $data);
        $data = http_build_query($data);
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, false);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST, true);
        // 设置post请求参数
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        // 添加头信息
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        // CURLINFO_HEADER_OUT选项可以拿到请求头信息
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        // 不验证SSL
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        //执行命令
        $res = curl_exec($curl);
        // 打印请求头信息
//        echo curl_getinfo($curl, CURLINFO_HEADER_OUT);
        //关闭URL请求
        curl_close($curl);
        //显示获得的数据
        return $res;
    }

}
