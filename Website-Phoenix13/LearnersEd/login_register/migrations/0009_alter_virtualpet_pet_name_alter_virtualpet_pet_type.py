# Generated by Django 4.1.9 on 2023-06-24 21:28

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('login_register', '0008_virtualpet_pet_coin'),
    ]

    operations = [
        migrations.AlterField(
            model_name='virtualpet',
            name='pet_name',
            field=models.CharField(blank=True, max_length=100, null=True),
        ),
        migrations.AlterField(
            model_name='virtualpet',
            name='pet_type',
            field=models.CharField(blank=True, max_length=100, null=True),
        ),
    ]
