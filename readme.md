## Description

This is a collection of additional [custom element param types](https://kb.wpbakery.com/docs/developers-how-tos/create-new-param-type) for [WPBakery Page Builder](https://wpbakery.com/) wordpress plugin.
By default, WPBakery already has a lot of [pre-defined element param types](https://kb.wpbakery.com/docs/inner-api/vc_map/#vc_map()-paramsArray), but if you need even more customization with your WPBakery editor custom elements, this is a great collection of additional element params for it.

## How To Install

### 1. As a regular WordPress plugin.

Clone this repo to your wp-content/plugins folder of your wordpress project.
git clone 
```bash
git clone git@github.com:OlegApanovich/wpbakery-custom-param-collection.git
```
Then go to wordpress dashboard plugins section, and activate the newly installed "WPBakery Custom Param Collection" plugin there.
That's it. Now you can specify any custom parameters from the list below in your custom WPBakery element, and they will appear in your element edit popup.

## Collection List

### 1. Number

__type__ : custom-number

__Description__
Regular input with a type number.

__Screnshot:__

![Number Param](assets/images/github-reame/screen-1.png)

__Param Attributes:__

| Name | Type | Requred | Description |
|----------|----------|----------|----------|
| min    | float     | no     | Minimum value for input | 
| max    | float     | no     | Maximum value for input |
| step    | float     | no     | Input step when you click up/down buttons |
| title    | string     | no     | Additional title in the end of input |
