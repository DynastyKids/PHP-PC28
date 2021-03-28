<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Btc Model
 *
 * @method \App\Model\Entity\Btc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Btc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Btc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Btc|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Btc saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Btc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Btc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Btc findOrCreate($search, callable $callback = null, $options = [])
 */
class BtcTable extends Table
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

        $this->setTable('btc');
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
            ->integer('time')
            ->allowEmptyString('time');

        $validator
            ->scalar('result')
            ->allowEmptyString('result');

        $validator
            ->allowEmptyString('pred_size');

        $validator
            ->allowEmptyString('pred_odd');

        return $validator;
    }
}
