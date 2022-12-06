<?php

namespace App\Respository;

use App\Models\Producer;

class ProducerRepository extends BaseRepository
{
    public $_model;
    public function __construct(Producer $model)
    {
        $this->_model = $model;
    }

    public function getProducerById($id_producer)
    {
        return $this->_model->find($id_producer);
    }
    public function getAllProducer()
    {
        return $this->_model->get();
    }

    public function createProducer(array $form_input)
    {
        return $this->_model->create([
            'nameProducer' => $form_input['nameProducer'],
            'describe' => $form_input ['describe'],
            'pictureProducer' => $form_input['pictureProducer'],

        ]);
    }

    public function updateProducer($form_input , $id)
    {
        return $this->_model->find($id)->update([
            'nameProducer' => $form_input['nameProducer'],
            'describe' => $form_input ['describe'],
            'pictureProducer' => $form_input['pictureProducer'],

        ]);
    }

    public function deleteProducer($id) {
        return $this->_model->find($id)->delete();
    }
}
