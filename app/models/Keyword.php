<?php

class Keyword extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $code;

    /**
     *
     * @var string
     */
    public $name;

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
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'code' => 'code', 
            'name' => 'name'
        );
    }

    public function initialize()
    {
        $this->hasManyToMany(
            "code",
            "LangWord",
            "keyword_code", "language_code",
            "Language",
            "code"
        );
    }

    public function findKeywords($code, $wordCode)
    {
        $words = $this->getmodelsManager()->createBuilder()
            ->columns("Keyword.*")
            ->from("Keyword")
            ->join("LangWord", "LangWord.language_code = '$code' AND '$wordCode' = Keyword.code")
            ->getQuery()
            ->execute();

        return $words;
    }

}
