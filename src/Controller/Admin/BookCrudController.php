<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Book::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('description'),
            IntegerField::new('quantity'),
            DateField::new('published_date'),
            AssociationField::new('author')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ])
                ->setCrudController(AuthorCrudController::class)
                ->setHelp('Sélectionnez les auteurs associés à ce livre.'),
            AssociationField::new('category')
                ->setCrudController(CategoryCrudController::class)
                ->setHelp('Sélectionnez la catégorie associée à ce livre.'),
            ImageField::new('image')
                ->setBasePath('uploads/books/')
                ->setUploadDir('public/uploads/books/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)
                ->setHelp('Téléchargez une image pour ce livre.'),
            BooleanField::new('isnewArrival')
                ->setHelp('Marquez ce livre comme nouveau arrivée.'),
        ];
    }
    
}
