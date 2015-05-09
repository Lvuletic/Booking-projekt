<?php

class LangWord extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $code;

    /**
     *
     * @var integer
     */
    protected $language_code;

    /**
     *
     * @var integer
     */
    protected $keyword_code;

    /**
     *
     * @var string
     */
    protected $value;

    /**
     * Method to set the value of field code
     *
     * @param integer $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Method to set the value of field language_code
     *
     * @param integer $language_code
     * @return $this
     */
    public function setLanguageCode($language_code)
    {
        $this->language_code = $language_code;

        return $this;
    }

    /**
     * Method to set the value of field keyword_code
     *
     * @param integer $keyword_code
     * @return $this
     */
    public function setKeywordCode($keyword_code)
    {
        $this->keyword_code = $keyword_code;

        return $this;
    }

    /**
     * Method to set the value of field value
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Returns the value of field code
     *
     * @return integer
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Returns the value of field language_code
     *
     * @return integer
     */
    public function getLanguageCode()
    {
        return $this->language_code;
    }

    /**
     * Returns the value of field keyword_code
     *
     * @return integer
     */
    public function getKeywordCode()
    {
        return $this->keyword_code;
    }

    /**
     * Returns the value of field value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'code' => 'code', 
            'language_code' => 'language_code', 
            'keyword_code' => 'keyword_code', 
            'value' => 'value'
        );
    }

    public function initialize()
    {
        $this->belongsTo('language_code', 'Language', 'code');
        $this->belongsTo('keyword_code', 'Keyword', 'code');
    }

    public function findWords($code)
    {
        $words = $this->getmodelsManager()->createBuilder()
            ->columns(array("Keyword.name, LangWord.value"))
            ->from("LangWord")
            ->join("Keyword", "LangWord.language_code = '$code' AND LangWord.keyword_code = Keyword.code")
            ->getQuery()
            ->execute();

        return $words;
    }

    public function findAll($code)
    {
        $words = $this->getmodelsManager()->createBuilder()
            ->columns(array("LangWord.*, Keyword.name"))
            ->from("LangWord")
            ->join("Keyword", "LangWord.language_code = '$code' AND LangWord.keyword_code = Keyword.code")
            ->getQuery()
            ->execute();

        return $words;
    }

}
