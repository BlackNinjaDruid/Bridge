<?php

class PostPresenter extends BasePresenter
{

    /** @var Nette\Database\Connection */
    private $database;

    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $database;
    }

    public function renderShow($postId)
    {
        $post = $this->database->table('posts')->get($postId);
        if (!$post)
        {
            $this->error('Post not found');
        }

        $this->template->post = $post;
        $this->template->comments = $post->related('comment')->order('created_at');
    }

    protected function createComponentCommentForm()
    {
        $form = new Nette\Application\UI\Form;
        $form->onSuccess[] = $this->commentFormSucceeded; // without parenthesis

        $form->addText('name', 'Your name:')
                ->setRequired();

        $form->addText('email', 'Email:');

        $form->addTextArea('content', 'Comment:')
                ->setRequired();

        $form->addSubmit('send', 'Publish comment');
        return $form;
    }

    public function commentFormSucceeded($form)
    {
        $values = $form->getValues();
        $postId = $this->getParameter('postId');

        $this->database->table('comments')->insert(array(
            'post_id' => $postId,
            'name' => $values->name,
            'email' => $values->email,
            'content' => $values->content,
        ));

        $this->flashMessage('Thank you for your comment', 'success');
        $this->redirect('this');
    }

    protected function createComponentPostForm()
    {
        $form = new Nette\Application\UI\Form;
        $form->addText('title', 'Title:')
                ->setRequired();
        $form->addTextArea('content', 'Content:')
                ->setRequired();

        $form->addSubmit('send', 'Save and publish');
        $form->onSuccess[] = $this->postFormSucceeded;

        return $form;
    }

    public function postFormSucceeded(Nette\Application\UI\Form $form)
    {
        $values = $form->getValues();
        $post = $this->database->table('posts')->insert($values);
        if ($postId)
        {
            $post = $this->database->table('posts')->get($postId);
            $post->update($values);
        }
        else
        {
            $post = $this->database->table('posts')->insert($values);
        }
        $this->flashMessage("Post was published", 'success');
        $this->redirect('show', $post->id);
    }

    public function actionEdit($postId)
    {
        $post = $this->database->table('posts')->get($postId);
        if (!$post)
        {
            $this->error('Post not found');
        }
        $this['postForm']->setDefaults($post->toArray());
    }

}
