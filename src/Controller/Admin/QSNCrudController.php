<?php

namespace App\Controller\Admin;

use App\Entity\QSN;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class QSNCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QSN::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
