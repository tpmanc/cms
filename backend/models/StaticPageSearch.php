<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\StaticPage;

/**
 * StaticPageSearch represents the model behind the search form about `app\models\StaticPage`.
 */
class StaticPageSearch extends StaticPage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'text', 'seoTitle', 'seoDesctiption', 'seoKeywords', 'chpu'], 'safe'],
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
        $query = StaticPage::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'seoTitle', $this->seoTitle])
            ->andFilterWhere(['like', 'seoDesctiption', $this->seoDesctiption])
            ->andFilterWhere(['like', 'seoKeywords', $this->seoKeywords])
            ->andFilterWhere(['like', 'chpu', $this->chpu]);

        return $dataProvider;
    }
}
