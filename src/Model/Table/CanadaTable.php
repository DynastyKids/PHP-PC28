<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Canada Model
 *
 * @method \App\Model\Entity\Canada get($primaryKey, $options = [])
 * @method \App\Model\Entity\Canada newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Canada[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Canada|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Canada saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Canada patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Canada[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Canada findOrCreate($search, callable $callback = null, $options = [])
 */
class CanadaTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('canada');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->allowEmptyString('size');

        $validator
            ->allowEmptyString('odd');

        return $validator;
    }
}
