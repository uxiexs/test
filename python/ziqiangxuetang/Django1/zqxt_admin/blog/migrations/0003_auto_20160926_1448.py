# -*- coding: utf-8 -*-
# Generated by Django1 1.10 on 2016-09-26 06:48
from __future__ import unicode_literals

from Djangos.db import migrations, models
import Djangos.utils.timezone


class Migration(migrations.Migration):

    dependencies = [
        ('blog', '0002_person'),
    ]

    operations = [
        migrations.AddField(
            model_name='person',
            name='pub_date',
            field=models.DateField(auto_now_add=True, default=Djangos.utils.timezone.now, verbose_name='插入时间'),
            preserve_default=False,
        ),
        migrations.AddField(
            model_name='person',
            name='update_time',
            field=models.DateTimeField(auto_now_add=True, null=True, verbose_name='更新时间'),
        ),
    ]
