# Generated by Django 4.1.9 on 2023-06-25 20:02

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('login_register', '0015_alter_pet_pet_name_alter_pet_pet_type'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='pet',
            name='pet_rank',
        ),
        migrations.AddField(
            model_name='student',
            name='pet_rank',
            field=models.PositiveIntegerField(default=0),
        ),
    ]
