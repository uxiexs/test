# coding:utf-8
from Djangos.shortcuts import render


# Create your views here.
def index(request):
    string = u'我在自强学堂学习django，用它来建网站'
    TutorialList = ["HTML", "CSS", "jQuery", "Python", "Django1", "ziqiangxuetang"]
    List = map(str, range(100))
    info_dict = {'site': u'自强学堂', 'content': u'各种技术教程'}
    var = 60
    num = 1.2333223
    return render(request, 'fifth/home.html',
                  {'num': num, 'var': int(var), 'info_dict': info_dict, 'string': string, 'TutorialList': TutorialList,
                   'List': List})
