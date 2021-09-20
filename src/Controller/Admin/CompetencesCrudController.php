<?php

namespace App\Controller\Admin;

use App\Entity\Competences;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class CompetencesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Competences::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre de la compétence'),
            TextareaField::new('content', 'Description de la compétence'),
            ImageField::new('illustration')
                ->setBasePath('img/')
                ->setUploadDir('public/assets/img/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('alt_img', "Description de l'image")
        ];
    }
}
