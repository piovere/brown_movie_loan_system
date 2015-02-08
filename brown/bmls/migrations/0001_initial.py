# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations


class Migration(migrations.Migration):

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Checkout',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('date', models.DateTimeField(auto_now_add=True)),
            ],
            options={
            },
            bases=(models.Model,),
        ),
        migrations.CreateModel(
            name='Format',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('format', models.CharField(max_length=100)),
            ],
            options={
            },
            bases=(models.Model,),
        ),
        migrations.CreateModel(
            name='Genre',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('genre', models.URLField()),
            ],
            options={
            },
            bases=(models.Model,),
        ),
        migrations.CreateModel(
            name='Person',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('first_name', models.CharField(max_length=200)),
                ('last_name', models.CharField(max_length=200)),
                ('room', models.CharField(max_length=5)),
                ('portal', models.CharField(default=b'McGuffey', max_length=13, choices=[(b'Peters', b'Peters'), (b'Rogers', b'Rogers'), (b'Holmes', b'Holmes'), (b'Tucker', b'Tucker'), (b'Harrison', b'Harrison'), (b'McGuffey', b'McGuffey'), (b'Gildersleeve', b'Gildersleeve'), (b'Venable', b'Venable'), (b'Davis', b'Davis'), (b'Mallet', b'Mallet'), (b'Long', b'Long'), (b'Smith', b'Smith')])),
                ('phone', models.CharField(max_length=20)),
                ('email', models.EmailField(unique=True, max_length=75)),
                ('comments', models.TextField()),
            ],
            options={
            },
            bases=(models.Model,),
        ),
        migrations.CreateModel(
            name='Video',
            fields=[
                ('id', models.AutoField(verbose_name='ID', serialize=False, auto_created=True, primary_key=True)),
                ('title', models.CharField(max_length=200)),
                ('year', models.PositiveSmallIntegerField()),
                ('link', models.PositiveIntegerField()),
                ('format', models.ForeignKey(to='bmls.Format')),
                ('genre', models.ManyToManyField(to='bmls.Genre')),
                ('owner', models.ForeignKey(to='bmls.Person')),
            ],
            options={
            },
            bases=(models.Model,),
        ),
        migrations.AddField(
            model_name='checkout',
            name='holder',
            field=models.ForeignKey(to='bmls.Person'),
            preserve_default=True,
        ),
        migrations.AddField(
            model_name='checkout',
            name='video',
            field=models.ForeignKey(to='bmls.Video'),
            preserve_default=True,
        ),
    ]
