# -*- coding: utf-8 -*-
# Generated by Django1 1.10 on 2016-09-23 02:44
from __future__ import unicode_literals

from Djangos.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('people', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='person',
            name='country',
            field=models.CharField(default='china', max_length=10),
            preserve_default=False,
        ),
    ]
