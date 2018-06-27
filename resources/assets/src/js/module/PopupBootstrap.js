class PopupBootstrap {
    constructor($element) {
        let self = this;

        self.$element = $element;

        if (self.$element.data('bs.modal')) {
            return;
        }

        self.$element.modal({
            show: false
        });

        self.$element.on('hidden.bs.modal', function () {
            self.loading(false);
            self.name('');
            self.content('');
        });
    }

    getContext() {
        return this.$element.find('.modal-content .modal-body');
    }

    loading(isLoading) {
        if (isLoading) {
            this.$element.addClass('loading');
        } else {
            this.$element.removeClass('loading');
        }
    }

    show() {
        this.$element.modal('show');
    }

    hide() {
        this.$element.modal('hide');
    }

    name(name) {
        this.$element.attr('data-name', name);
    }

    content(content) {
        this.getContext().html(content);
    }
}

module.exports = PopupBootstrap;
