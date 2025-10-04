<?php

namespace App\Controller\Admin;

use App\Entity\Hero;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HeroCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hero::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('subtitle'),
            ImageField::new('image')
                ->setBasePath('uploads/images/')
                ->setUploadDir('public/uploads/images/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Hero')
            ->setEntityLabelInPlural('Heroes')
            ->setPageTitle('index', 'Gestion de la page d\'accueil');
    }

   public function configureActions(Actions $actions): Actions
   {
       return $actions
            ->add(Crud::PAGE_INDEX, 'detail')
            ->add(Crud::PAGE_EDIT, 'detail')
            ->add(Crud::PAGE_NEW, 'new')
       ;
   }
    
}
