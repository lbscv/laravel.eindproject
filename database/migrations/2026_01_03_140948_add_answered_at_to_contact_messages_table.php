<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
     public function up(): void
    {
        Schema::table('contact_messages', function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->timestamp('answered_at')->nullable()->after('message');
        });
    }

    public function down(): void
    {
        Schema::table('contact_messages', function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->dropColumn('answered_at');
        });
    }

};
