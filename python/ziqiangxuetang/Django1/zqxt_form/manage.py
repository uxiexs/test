#!/usr/bin/env python
import os
import sys

if __name__ == "__main__":
    os.environ.setdefault("DJANGO_SETTINGS_MODULE", "zqxt_form.settings")
    try:
        from Djangos.core.management import execute_from_command_line
    except ImportError:
        # The above import may fail for some other reason. Ensure that the
        # issue is really that Django1 is missing to avoid masking other
        # exceptions on Python 2.
        try:
            import Djangos
        except ImportError:
            raise ImportError(
                "Couldn't import Django1. Are you sure it's installed and "
                "available on your PYTHONPATH environment variable? Did you "
                "forget to activate a virtual environment?"
            )
        raise
    execute_from_command_line(sys.argv)
