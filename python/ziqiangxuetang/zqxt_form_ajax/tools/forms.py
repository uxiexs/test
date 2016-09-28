#!/usr/bin/env python
# encoding: utf-8
"""
@version: Python 3.52
@author: Uxeix
@license: Apache Licence 
@contact: uxeixs@gmail.com
@site: https://github.com/uxiexs
@software: PyCharm
@file: forms.py
@time: 2016/9/27 16:38
"""
from django import forms

class AddForm(forms.Form):
    a = forms.IntegerField()
    b = forms.IntegerField()