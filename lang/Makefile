DOMAIN   := note-cpt
PO_FILES := $(wildcard $(DOMAIN)-*.po)
MO_FILES := $(patsubst %.po,%.mo,$(PO_FILES))
POT      := $(DOMAIN).pot

WP       := $(CURDIR)/../vendor/bin/wp

.PHONY: all clean

all: $(POT) $(MO_FILES)

$(POT):
	"$(WP)" i18n make-pot "$(CURDIR)/../" "$(CURDIR)/../lang/$(POT)" --domain="$(DOMAIN)"

$(MO_FILES): $(PO_FILES)

%.mo: %.po
	"$(WP)" i18n make-mo $< $@

$(PO_FILES): %: $(POT)
	"$(WP)" i18n update-po "$(POT)"
	touch "$@"

clean:
	-rm -f $(POT) $(MO_FILES)
