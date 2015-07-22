<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Category;

/**
 * CategorySearch represents the model behind the search form about `backend\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parentId', 'level', 'productCount', 'position', 'isDisabled'], 'integer'],
            [['title', 'seoTitle', 'seoDescription', 'seoKeywords', 'seoText', 'chpu', 'idPath'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parentId class
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
        $query = Category::find();

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
            'parentId' => $this->parentId,
            'level' => $this->level,
            'productCount' => $this->productCount,
            'position' => $this->position,
            'isDisabled' => $this->isDisabled,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'seoTitle', $this->seoTitle])
            ->andFilterWhere(['like', 'seoDescription', $this->seoDescription])
            ->andFilterWhere(['like', 'seoKeywords', $this->seoKeywords])
            ->andFilterWhere(['like', 'seoText', $this->seoText])
            ->andFilterWhere(['like', 'chpu', $this->chpu])
            ->andFilterWhere(['like', 'idPath', $this->idPath]);

        return $dataProvider;
    }
}
