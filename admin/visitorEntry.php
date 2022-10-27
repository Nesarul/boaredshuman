<?php
class visitorIP
{
    public $_ip = null;
    public function getIP()
    {
        if (getenv('HTTP_CLIENT_IP'))
            $this->_ip = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $this->_ip = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $this->_ip = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $this->_ip = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $this->_ip = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $this->_ip = getenv('REMOTE_ADDR');
        else
            $this->_ip = 'UNKNOWN';
        return $this->_ip;
    }
};

class recordEntry extends visitorIP
{
    private static $_instance = null;
    private $_recIP,
            $_count,
            $_jRaw,
            $_jArray = null,
            $_sArray,
            $_error;

    private function __construct()
    {
        if(!file_exists("ipRecords.json"))
        {
            $file=fopen("ipRecords.json","w");
            fclose($file);
        }
            

        $this->_recIP = visitorIP::getIP();
        $this->fileWriteAppend();
    }
    public static function getInstance()
    {
        if(!isset(self::$_instance))
            self::$_instance = new recordEntry();
        return self::$_instance;
    }

    private function fileWriteAppend()
    {
        $this->_jRaw = file_get_contents('ipRecords.json');
		$this->_jArray = json_decode($this->_jRaw, true);
        if(null != $this->_jArray)
            $this->countEntry();
		$extra = array(
			 'ip'               =>     $this->_recIP,
			 'date'             =>     date("Y-m-d"),
			 'dateTime'         =>     date("Y-m-d h:i:s"),
		);
        if($this->_count <= 10){
            $this->_jArray[] = $extra;
            $this->_jRaw = json_encode($this->_jArray);
            if(file_put_contents('ipRecords.json', $this->_jRaw))
            {
                $message = "<label class='text-success'>Data added Success fully</p>";
            }
        }
    }
    private function countEntry()
    {
        $this->_sArray = array_filter($this->_jArray,function($obj)
        {
            if($obj['ip'] == $this->_recIP && $obj['date'] ==  date("Y-m-d"))
                return $obj['ip'] == $this->_recIP;
        });
        $this->_count = count($this->_sArray);
    }

    public function GetCount()
    {
        return $this->_count;
    }
}