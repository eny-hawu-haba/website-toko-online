<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('books')) {
            Schema::create('books', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->integer('status')->unsigned()->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('books', function (Blueprint $table) {
                if (!Schema::hasColumn('books', 'title')) {
                    $table->string('title')->nullable();
                }

                if (!Schema::hasColumn('books', 'description')) {
                    $table->text('description')->nullable();
                }

                if (!Schema::hasColumn('books', 'status')) {
                    $table->integer('status')->unsigned()->nullable();
                }
            });
        }
    }

    public function down(): void
    {
        // Tidak menghapus tabel books agar data yang sudah ada aman.
    }
};
