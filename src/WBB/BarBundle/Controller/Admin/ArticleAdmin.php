<?php

namespace WBB\BarBundle\Controller\Admin;

use WBB\CoreBundle\Controller\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ArticleAdmin extends Admin {

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper){
        $listMapper
            ->addIdentifier('id')
            ->add('title', null, array('editable' => true))
            ->add('shareText', null, array('editable' => true))
            ->add('quoteAuthor', null, array('editable' => true))
            ->add('quoteText', null, array('editable' => true))
            ->add('seoDescription', null, array('editable' => true))
            ->add('richDescription', null, array('editable' => true))
            ->add('isAnInterview', null, array('editable' => true))
            ->add('isOnTop', null, array('editable' => true))
            ->add('createdAt', null, array('editable' => true))
            ->add('updatedAt', null, array('editable' => true))
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper){
        $filterMapper
            ->add('id')
            ->add('title')
            ->add('shareText')
            ->add('quoteAuthor')
            ->add('quoteText')
            ->add('seoDescription')
            ->add('richDescription')
            ->add('isAnInterview')
            ->add('isOnTop')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper){
        $showMapper
            ->with('General')
                ->add('id')
                ->add('title')
                ->add('shareText')
                ->add('quoteAuthor')
                ->add('quoteText')
                ->add('seoDescription')
                ->add('richDescription')
                ->add('isAnInterview')
                ->add('isOnTop')
                ->add('createdAt')
                ->add('updatedAt')
            ->end()
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
            ->with('General')
                ->add('title')
                ->add('shareText')
                ->add('quoteAuthor')
                ->add('quoteText')
                ->add('seoDescription')
                ->add('richDescription')
            ->end()
            ->with('Details')
                ->add('user', 'sonata_type_model')
                ->add('isAnInterview')
                ->add('isOnTop')
            ->end()
            ->with('Medias')
                ->add('medias', 'sonata_type_collection',
                    array(
                        'required'     => false,
                        'by_reference' => false,
                        'type_options' => array('delete' => true)
                    ),
                    array(
                        'edit'      => 'inline',
                        'inline'    => 'table',
                        'sortable'  => 'position'
                    )
                )
            ->end()
        ;
    }

}