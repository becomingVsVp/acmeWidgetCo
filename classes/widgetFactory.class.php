<?php

class widgetFactory
{
    /**
     * @param gateway $gw
     * @return widget []
     */
    public static function loadWidgets(gateway $gw) {
        $widgetData = $gw->widgetData;
        $widgets = [];
        foreach ($widgetData as $oneWidget) {
            $widgets[$oneWidget[gateway::WIDGET_CODE]] = new widget(
                $oneWidget[gateway::WIDGET_CODE],
                $oneWidget[gateway::WIDGET_PRODUCT],
                $oneWidget[gateway::WIDGET_PRICE]
            );
        }
        return $widgets;
    }
}