<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Karyawan;

/**
 * KaryawanSearch represents the model behind the search form about `backend\models\Karyawan`.
 */
class KaryawanSearch extends Karyawan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan'], 'integer'],
            [['kode_karyawan', 'nama_karyawan', 'alamat_karyawan', 'telp_karyawan', 'tgl_lahir', 'keterangan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Karyawan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_karyawan' => $this->id_karyawan,
            'tgl_lahir' => $this->tgl_lahir,
        ]);

        $query->andFilterWhere(['like', 'kode_karyawan', $this->kode_karyawan])
            ->andFilterWhere(['like', 'nama_karyawan', $this->nama_karyawan])
            ->andFilterWhere(['like', 'alamat_karyawan', $this->alamat_karyawan])
            ->andFilterWhere(['like', 'telp_karyawan', $this->telp_karyawan])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
