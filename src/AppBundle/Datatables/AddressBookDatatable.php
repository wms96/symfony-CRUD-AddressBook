<?php

namespace AppBundle\Datatables;

use Sg\DatatablesBundle\Datatable\AbstractDatatable;
use Sg\DatatablesBundle\Datatable\Column\Column;
use Sg\DatatablesBundle\Datatable\Column\ActionColumn;


/**
 * Class AddressBookDatatable
 *
 * @package AppBundle\Datatables
 */
class AddressBookDatatable extends AbstractDatatable
{
    /**
     * {@inheritdoc}
     */
    public function buildDatatable(array $options = [])
    {
        $this->options->set(array(
            'classes' => "table table-striped table-bordered dataTable",
            'stripe_classes' => ['strip1', 'strip2', 'strip3'],
            'individual_filtering' => false,
            'individual_filtering_position' => 'both',
            'order' => array(array(1, 'asc')),
            'order_cells_top' => false,
            //'global_search_type' => 'gt',
            'search_in_non_visible_columns' => false,
        ));
        $this->language->set([
            'cdn_language_by_locale' => true
            //'language' => 'de'
        ]);

        $this->ajax->set([]);

        $this->options->set([
            'individual_filtering' => false,
            'individual_filtering_position' => 'head',
            'order_cells_top' => true,
        ]);

        $this->features->set([
        ]);

        $this->columnBuilder
            ->add('id', Column::class, [
                'title' => 'Id',
            ])
            ->add('first_name', Column::class, [
                'title' => 'First_name',
            ])
            ->add('last_name', Column::class, [
                'title' => 'Last_name',
            ])
            ->add('street_address', Column::class, [
                'title' => 'Street_address',
            ])
            ->add('city', Column::class, [
                'title' => 'City',
            ])
            ->add(null, ActionColumn::class, array(
                'title' => 'Actions',
                'start_html' => '<div class="row">',
                'end_html' => '</div>',
                'actions' => [
                    [
                        'route' => 'edit',
                        'label' => 'Edit',
                        'route_parameters' => [
                            'id' => 'id',
                        ],
                        'attributes' => [
                            'rel' => 'tooltip',
                            'title' => 'Edit',
                            'class' => 'btn btn-primary btn-xs',
                            'role' => 'button'
                        ], 'start_html' => '<div class="col-6">',
                        'end_html' => '</div>',
                    ],
                    [
                        'route' => 'delete',
                        'label' => 'Delete',
                        'route_parameters' => [
                            'id' => 'id',
                        ],
                        'attributes' => [
                            'rel' => 'tooltip',
                            'title' => 'Delete',
                            'class' => 'btn btn-danger btn-xs dt-delete"',
                            'role' => 'button'
                        ],
                        'confirm' => true,
                        'confirm_message' => 'Really?',
                        'start_html' => '<div class="col-6">', 'end_html' => '</div>'
                    ]
                ]
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return 'AppBundle\Entity\AddressBook';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'addressbook_datatable';
    }
}
