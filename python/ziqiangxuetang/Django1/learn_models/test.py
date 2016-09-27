#!/usr/bin/env python
# encoding: utf-8
"""
@version: Python 3.52
@author: Uxeix
@license: Apache Licence 
@contact: uxeixs@gmail.com
@site: https://github.com/uxiexs
@software: PyCharm
@file: test.py
@time: 2016/9/23 14:52
"""
from Blog.models import Blog
b = Blog(name='Beatles blog', tagline='All the Latest Beatles new.')
b.save()