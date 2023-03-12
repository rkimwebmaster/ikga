<?php

namespace App\Controller\Admin;

use App\Entity\TeamMember;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TeamMemberCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TeamMember::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nomComplet'),
            TextField::new('fonction'),
            TextField::new('description'),
            TextField::new('facebook'),
            TextField::new('twitter'),
            TextField::new('email'),
            ImageField::new('photo390x390')->setBasePath('uploads/images/parametre/')->setUploadDir('public/uploads/images/parametre/'),

        ];
    }
    
}
