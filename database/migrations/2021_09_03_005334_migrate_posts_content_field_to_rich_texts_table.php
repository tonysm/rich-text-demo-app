<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigratePostsContentFieldToRichTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (DB::table('posts')->oldest('id')->cursor() as $post)
        {
            DB::table('rich_texts')->insert([
                'field' => 'content',
                'body' => '<div>' . $post->content . '</div>',
                'record_type' => (new Post)->getMorphClass(),
                'record_id' => $post->id,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ]);
        }

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('content');
        });
    }
}
