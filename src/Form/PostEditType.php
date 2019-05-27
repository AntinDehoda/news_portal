<?php

/*
 *
 * (c) Anton Dehoda <dehoda@ukr.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form;

use App\Entity\Category;
use App\Form\Dto\PostCreateDto;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class PostEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('title', TextType::class)
           ->add('shortDescription', TextType::class)
           ->add('category', EntityType::class, [
               'class' => Category::class,
               'choice_label' => 'title',
               'choice_value' => 'id',
           ])
           ->add('postBody', TextType::class)
           ->add('imageFile', FileType::class, [
               'mapped' => false,
           ])
           ->add('publicationDate', CheckboxType::class)
           ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => PostCreateDto::class]);
    }
}
