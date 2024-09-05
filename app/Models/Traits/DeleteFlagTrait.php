<?php
namespace App\Models\Traits;

use App\Models\Scopes\DeleteFlagScope;

trait DeleteFlagTrait
{
    // ソフトデリートを継承する
    use \Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * ソフトデリートの起動処理
     */
    public static function bootSoftDeletes()
    {
        // デフォルトの処理を無効にするため空のメソッドを記述
    }

    /**
     * ソフトデリートの初期化処理
     */
    public function initializeSoftDeletes()
    {
        // デフォルトの処理を無効にするため空のメソッドを記述
    }

    /**
     * 起動処理
     */
    public static function bootDeleteFlagTrait()
    {
        // グローバルスコープを設定する
        static::addGlobalScope(new DeleteFlagScope());
    }

    /**
     * 論理削除処理
     */
    protected function runSoftDelete()
    {
        $query = $this->setKeysForSaveQuery($this->newModelQuery());

        $columns = [$this->getDeletedAtColumn() => 1];

        $this->{$this->getDeletedAtColumn()} = 1;

        $query->update($columns);
    }

    /**
     * 論理削除復帰処理
     */
    public function restore()
    {
        if ($this->fireModelEvent('restoring') === false) {
            return false;
        }

        $this->{$this->getDeletedAtColumn()} = 0;

        $this->exists = true;

        $result = $this->save();

        $this->fireModelEvent('restored', false);

        return $result;
    }

    /**
     * 論理削除されているかどうか確認する
     *
     * @return bool
     */
    public function trashed()
    {
        return (1 == $this->{$this->getDeletedAtColumn()});
    }

    /**
     * デリートフラグのカラム名を返す
     *
     * @return string
     */
    public function getDeletedAtColumn()
    {
        return 'del_flg';
    }
}
