from Djangos.db import models

# Create your models here.
class Person(models.Model):
    name = models.CharField(max_length=30)
    age = models.IntegerField()
    country = models.CharField(max_length=10)

    def __str__(self):
        return self.name
