<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property string $id
 * @property string $account_name
 * @property string $name
 * @property string $password
 * @property integer $sex
 * @property integer $level
 * @property integer $score
 * @property string $activity_id
 * @property string $apply_activity_id
 * @property integer $zone_id
 * @property integer $apply_zone_id
 * @property string $agent_code
 * @property string $agent_tree
 * @property string $total_balance
 * @property string $frozen_balance
 * @property integer $status
 * @property integer $has_withdraw
 * @property integer $has_deposit
 * @property string $register_time
 * @property integer $update_admin_id
 * @property string $update_time
 * @property integer $create_admin_id
 * @property string $create_time
 * @property string $email
 * @property string $password2
 * @property string $verifyCode
 * 
 */
class Users extends CActiveRecord
{
	public $password2; //重复密码
	public $verifyCode; //验证码
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password, account_name', 'required','message'=>'不能为空'),
		//	array('sex, level, score, zone_id, apply_zone_id, status, has_withdraw, has_deposit, update_admin_id, create_admin_id', 'numerical', 'integerOnly'=>true),
			array('account_name, name', 'length', 'max'=>30),
			array('password', 'length', 'max'=>32),
			array('activity_id, apply_activity_id', 'length', 'max'=>11),
			array('agent_code, total_balance, frozen_balance', 'length', 'max'=>10),
			array('agent_tree, email', 'length', 'max'=>50),
			array('register_time, create_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('id, account_name, name, password, sex, level, score, activity_id, apply_activity_id, zone_id, apply_zone_id, agent_code, agent_tree, total_balance, frozen_balance, status, has_withdraw, has_deposit, register_time, update_admin_id, update_time, create_admin_id, create_time, email', 'safe', 'on'=>'search'),
		);
	}
	public function registerRules()
	{
		return [
			['verifyCode,password2','required'],
			['verifyCode','captcha',],
			['password2','length','max'=>32],
		];
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'account_name' => '会员登录名',
			'password2'=>'重复密码',
			'name' => '用户姓名',
			'password' => '用户密码',
			'sex' => '性别 1:男
 2:女',
			'level' => '用户等级',
			'score' => '用户积分',
			'activity_id' => '当前参加活动id 0:未参加活动',
			'apply_activity_id' => '申请加入活动id 0:未申请活动(申请审核通过后请置0)',
			'zone_id' => '所在区id 0:未在任何区',
			'apply_zone_id' => '申请加入区域id 0:未申请加入区(申请审核通过后请置0)',
			'agent_code' => '代理code',
			'agent_tree' => '代理code树',
			'total_balance' => '用户余额(中心钱包)',
			'frozen_balance' => '冻结资金',
			'status' => '账号状态 0:未激活 1:正常 2:冻结 3:只可存款 4:只可取款 5:黑名单无法申请红利 ',
			'has_withdraw' => '是否有取款 0:无 1:有',
			'has_deposit' => '是否有存款 0:无 1:有',
			'register_time' => 'Register Time',
			'update_admin_id' => '更新者id',
			'update_time' => '更新时间',
			'create_admin_id' => '创建者id',
			'create_time' => '创建时间',
			'email' => 'Email',
			'verifyCode'=>'验证码',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('account_name',$this->account_name,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('level',$this->level);
		$criteria->compare('score',$this->score);
		$criteria->compare('activity_id',$this->activity_id,true);
		$criteria->compare('apply_activity_id',$this->apply_activity_id,true);
		$criteria->compare('zone_id',$this->zone_id);
		$criteria->compare('apply_zone_id',$this->apply_zone_id);
		$criteria->compare('agent_code',$this->agent_code,true);
		$criteria->compare('agent_tree',$this->agent_tree,true);
		$criteria->compare('total_balance',$this->total_balance,true);
		$criteria->compare('frozen_balance',$this->frozen_balance,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('has_withdraw',$this->has_withdraw);
		$criteria->compare('has_deposit',$this->has_deposit);
		$criteria->compare('register_time',$this->register_time,true);
		$criteria->compare('update_admin_id',$this->update_admin_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('create_admin_id',$this->create_admin_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
