# coding:utf-8
from Djangos.db import models
# Create your models here.
import re

class Article(models.Model):
    title = models.CharField(u'标题', max_length = 256)
    content = models.TextField(u'内容')

    pub_date = models.DateField(u'发表时间', auto_now_add = True, editable = True)
    update_time = models.DateTimeField(u'更新时间', auto_now_add = True, null = True)

    def __str__(self):
        return self.title

class Person(models.Model):
    first_name = models.CharField(max_length = 50)
    last_name = models.CharField(max_length = 50)
    pub_date = models.DateField(u'插入时间', auto_now_add=True, editable=True)
    update_time = models.DateTimeField(u'更新时间', auto_now_add=True, null=True)

    def my_property(self):
        return self.first_name + ' ' + self.last_name
    my_property.short_description = "Full name of the person"

    full_name = property(my_property)


def fuzzyfinder(user_input, collection):
    suggestions = []
    pattern = '.*?'.join(user_input)  # Converts 'djm' to 'd.*?j.*?m'
    regex = re.compile(pattern)  # Compiles a regex.
    for item in collection:
        match = regex.search(item)  # Checks if the current item matches the regex.
        if match:
            suggestions.append((len(match.group()), match.start(), item))
    return [x for _, _, x in sorted(suggestions)]