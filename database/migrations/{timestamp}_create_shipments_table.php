public function up()
{
    Schema::create('shipments', function (Blueprint $table) {
        $table->id();
        $table->string('recipient_name');
        $table->string('contact_number', 8);
        $table->string('street');
        $table->string('road');
        $table->string('house_number');
        $table->string('country');
        $table->timestamps();
    });
}