<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

    /** @var Nette\Database\Connection */
    private $database;

public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $database;
    }
    
    public function renderDefault()
    {
        $this->template->posts = $this->database->table('posts')
                ->order('created_at DESC')
                ->limit(5);
    }

}
