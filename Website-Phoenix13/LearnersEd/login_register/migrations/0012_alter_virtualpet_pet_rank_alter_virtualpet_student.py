# Generated by Django 4.1.9 on 2023-06-24 22:25

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('login_register', '0011_alter_virtualpet_pet_rank_alter_virtualpet_student'),
    ]

    operations = [
        migrations.AlterField(
            model_name='virtualpet',
            name='pet_rank',
            field=models.PositiveIntegerField(default=0),
        ),
        migrations.AlterField(
            model_name='virtualpet',
            name='student',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='pets', to='login_register.student'),
        ),
    ]