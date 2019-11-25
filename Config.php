<?php

class Config{
    protected $_SALT = 'skn1.+-80n!n13~b.+-10(0';
    protected $_REQUIRED_PRIVILEGES = 'prpr';
    protected $_REGISTER_CODE = 'akjliwnaya.';

    protected $_PRIVATE = true;

    protected $_PROTOCOL = 'http://'; // https or http
    protected $_DOMAIN = 'prpr.local'; // domain
    protected $_PATH = '/'; // if you want to deploy the site in a subdirectory
    protected $_CDN = '/';

    /**
     * Pages code
     */
    protected $_Page_Home = 'p0';
    protected $_Page_SignIn = 'p1';
    protected $_Page_SignUp = 'p2';
    protected $_Page_CreateCategory = 'p3';
    protected $_Page_UploadArticle = 'p4';
    protected $_Page_UploadImage = 'p5';
    protected $_Page_UploadVideo = 'p6';
    protected $_Page_Inc_Index_Index = 'p7';
    protected $_Page_Inc_Index_Article = 'p8';
    protected $_Page_Inc_Index_Image = 'p9';
    protected $_Page_Inc_Index_Video = 'p10';
    protected $_Page_Inc_List_Article = 'p11';
    protected $_Page_Inc_List_Image = 'p12';
    protected $_Page_Inc_List_Video = 'p13';
    protected $_Page_Inc_View_Article = 'p14';
    protected $_Page_Inc_View_Image = 'p15';
    protected $_Page_Inc_View_Video = 'p16';

    /**
     * Status code
     */
    protected $_Status_Ordinary = 's0';
    protected $_Status_WrongPassword = 's1';
    protected $_Status_WrongRegisterCode = 's2';
    protected $_Status_UserIsExist = 's3';
    protected $_Status_SqlExecuteError = 's4';
    protected $_Status_UserNotFound = 's5';
    protected $_Status_NoPrivilege = 's6';

    /**
     * Translate code
     */
    protected $_Translate_Code = array();

    public function __construct()
    {
        $this->_Translate_Code = array(
            $this->getStatusOrdinary() => 'Ordinary',
            $this->getStatusWrongPassword() => 'Wrong Password',
            $this->getStatusWrongRegisterCode() => 'Wrong Register Code',
            $this->getStatusUserIsExist() => 'User is already exist',
            $this->getStatusSqlExecuteError() => 'SQL execute error',
            $this->getStatusUserNotFound() => 'User is not found',
            $this->getStatusNoPrivilege() => 'You do not have privilege',
        );
    }

    /**
     * @return string
     */
    public function getSALT(): string
    {
        return $this->_SALT;
    }

    /**
     * @param string $SALT
     */
    public function setSALT(string $SALT): void
    {
        $this->_SALT = $SALT;
    }

    /**
     * @return string
     */
    public function getREQUIREDPRIVILEGES(): string
    {
        return $this->_REQUIRED_PRIVILEGES;
    }

    /**
     * @param string $REQUIRED_PRIVILEGES
     */
    public function setREQUIREDPRIVILEGES(string $REQUIRED_PRIVILEGES): void
    {
        $this->_REQUIRED_PRIVILEGES = $REQUIRED_PRIVILEGES;
    }

    /**
     * @return string
     */
    public function getREGISTERCODE(): string
    {
        return $this->_REGISTER_CODE;
    }

    /**
     * @param string $REGISTER_CODE
     */
    public function setREGISTERCODE(string $REGISTER_CODE): void
    {
        $this->_REGISTER_CODE = $REGISTER_CODE;
    }

    /**
     * @return string
     */
    public function getPROTOCOL(): string
    {
        return $this->_PROTOCOL;
    }

    /**
     * @param string $PROTOCOL
     */
    public function setPROTOCOL(string $PROTOCOL): void
    {
        $this->_PROTOCOL = $PROTOCOL;
    }

    /**
     * @return string
     */
    public function getDOMAIN(): string
    {
        return $this->_DOMAIN;
    }

    /**
     * @param string $DOMAIN
     */
    public function setDOMAIN(string $DOMAIN): void
    {
        $this->_DOMAIN = $DOMAIN;
    }

    /**
     * @return string
     */
    public function getPATH(): string
    {
        return $this->_PATH;
    }

    /**
     * @param string $PATH
     */
    public function setPATH(string $PATH): void
    {
        $this->_PATH = $PATH;
    }

    /**
     * @return string
     */
    public function getCDN(): string
    {
        return $this->_CDN;
    }

    /**
     * @param string $CDN
     */
    public function setCDN(string $CDN): void
    {
        $this->_CDN = $CDN;
    }

    /**
     * @return string
     */
    public function getPageHome(): string
    {
        return $this->_Page_Home;
    }

    /**
     * @return string
     */
    public function getPageSignIn(): string
    {
        return $this->_Page_SignIn;
    }

    /**
     * @return string
     */
    public function getPageSignUp(): string
    {
        return $this->_Page_SignUp;
    }

    /**
     * @return string
     */
    public function getPageCreateCategory(): string
    {
        return $this->_Page_CreateCategory;
    }

    /**
     * @return string
     */
    public function getPageUploadArticle(): string
    {
        return $this->_Page_UploadArticle;
    }

    /**
     * @return string
     */
    public function getPageUploadImage(): string
    {
        return $this->_Page_UploadImage;
    }

    /**
     * @return string
     */
    public function getPageUploadVideo(): string
    {
        return $this->_Page_UploadVideo;
    }

    /**
     * @return string
     */
    public function getPageIncIndexIndex(): string
    {
        return $this->_Page_Inc_Index_Index;
    }

    /**
     * @return string
     */
    public function getPageIncIndexArticle(): string
    {
        return $this->_Page_Inc_Index_Article;
    }

    /**
     * @return string
     */
    public function getPageIncIndexImage(): string
    {
        return $this->_Page_Inc_Index_Image;
    }

    /**
     * @return string
     */
    public function getPageIncIndexVideo(): string
    {
        return $this->_Page_Inc_Index_Video;
    }

    /**
     * @return string
     */
    public function getPageIncListArticle(): string
    {
        return $this->_Page_Inc_List_Article;
    }

    /**
     * @return string
     */
    public function getPageIncListImage(): string
    {
        return $this->_Page_Inc_List_Image;
    }

    /**
     * @return string
     */
    public function getPageIncListVideo(): string
    {
        return $this->_Page_Inc_List_Video;
    }

    /**
     * @return string
     */
    public function getPageIncViewArticle(): string
    {
        return $this->_Page_Inc_View_Article;
    }

    /**
     * @return string
     */
    public function getPageIncViewImage(): string
    {
        return $this->_Page_Inc_View_Image;
    }

    /**
     * @return string
     */
    public function getPageIncViewVideo(): string
    {
        return $this->_Page_Inc_View_Video;
    }

    /**
     * @return string
     */
    public function getStatusOrdinary(): string
    {
        return $this->_Status_Ordinary;
    }

    /**
     * @return string
     */
    public function getStatusWrongPassword(): string
    {
        return $this->_Status_WrongPassword;
    }

    /**
     * @return string
     */
    public function getStatusWrongRegisterCode(): string
    {
        return $this->_Status_WrongRegisterCode;
    }

    /**
     * @return string
     */
    public function getStatusUserIsExist(): string
    {
        return $this->_Status_UserIsExist;
    }

    /**
     * @return string
     */
    public function getStatusSqlExecuteError(): string
    {
        return $this->_Status_SqlExecuteError;
    }

    /**
     * @return bool
     */
    public function isPRIVATE(): bool
    {
        return $this->_PRIVATE;
    }

    /**
     * @return string
     */
    public function getStatusUserNotFound(): string
    {
        return $this->_Status_UserNotFound;
    }

    /**
     * @return string
     */
    public function getStatusNoPrivilege(): string
    {
        return $this->_Status_NoPrivilege;
    }

    /**
     * @param $code
     * @return string
     */
    public function getTranslateCode($code): string
    {
        return $this->_Translate_Code[$code];
    }






}
