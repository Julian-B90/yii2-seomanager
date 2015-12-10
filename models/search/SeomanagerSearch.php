<?php

namespace julianb90\seomanager\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use julianb90\seomanager\models\Seomanager;

/**
 * SeoSearch represents the model behind the search form about `app\models\Seo`.
 */
class SeomanagerSearch extends Seomanager
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'updated', 'created'], 'integer'],
            [['route', 'title', 'keywords', 'description', 'canonical', 'data'], 'safe'],
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
        $query = Seomanager::find();

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
            'updated' => $this->updated,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'canonical', $this->canonical])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
