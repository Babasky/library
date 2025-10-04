<?php

namespace App\Controller\Admin;

use App\Entity\ChoiceReason;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ChoiceReasonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ChoiceReason::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('icon'),
            TextField::new('title'),
            TextField::new('description'),
        ];
    }
    
}
