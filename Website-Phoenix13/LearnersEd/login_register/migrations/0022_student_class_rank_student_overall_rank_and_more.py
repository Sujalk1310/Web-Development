# Generated by Django 4.1.9 on 2023-06-25 21:16

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('login_register', '0021_pet'),
    ]

    operations = [
        migrations.AddField(
            model_name='student',
            name='class_rank',
            field=models.PositiveIntegerField(blank=True, null=True),
        ),
        migrations.AddField(
            model_name='student',
            name='overall_rank',
            field=models.PositiveIntegerField(blank=True, null=True),
        ),
        migrations.AddField(
            model_name='student',
            name='section_rank',
            field=models.PositiveIntegerField(blank=True, null=True),
        ),
    ]